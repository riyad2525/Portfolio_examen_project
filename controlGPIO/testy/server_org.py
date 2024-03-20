import time, BaseHTTPServer, urlparse, serial, os.path, thread, subprocess, signal
import wiringpi2 as wiringpi
wiringpi.wiringPiSetupGpio()
wiringpi.pinMode(24,1)#button1
wiringpi.pinMode(2,1)#button2
wiringpi.pinMode(16,1)#button3
wiringpi.pinMode(20,1)#button4
wiringpi.pinMode(5,1)#button5
wiringpi.pinMode(6,1)#button6

wiringpi.digitalWrite(24,0) #alle gpio 0 zetten
wiringpi.digitalWrite(25,0)
wiringpi.digitalWrite(2,0)
wiringpi.digitalWrite(16,0)
wiringpi.digitalWrite(20,0)
wiringpi.digitalWrite(5,0)

usbport = '/dev/ttyAMA0'
ser = serial.Serial(usbport, 9600)

HOST_NAME = '0.0.0.0'
PORT_NUMBER = 80

logins = []
# In deze array komen alle ingelogde IPs
username = 'rebox'
password = 'admin'

status1 = False #led statussen op False zetten
status2 = False
status3 = False
status4 = False
status5 = False
status6 = False

button1 = False #button statussen op False zetten
button2 = False
button3 = False
button4 = False
button5 = False
button6 = False

class MyHandler(BaseHTTPServer.BaseHTTPRequestHandler):
    def do_HEAD(s):
        s.send_response(200)
        s.send_header("Content-type", "text/html")
        s.end_headers()
    def do_POST(s):
        s.send_response(200)
        s.send_header("Content-type", "text/html")
        s.end_headers()
        if not s.client_address[0] in logins:
            if s.path == '/' or s.path == '/index.html':
                data = urlparse.parse_qs(s.rfile.read(int(s.headers.getheader('content-length'))))
                if 'username' in data and 'password' in data:
                    if data['username'][0] == username and data['password'][0] == password:
                        print data['username'][0] + ' logged in at ' + s.client_address[0]
                        logins.append(s.client_address[0]) # Add IP to logged in users
            s.wfile.write(s.path2page('/'))
        else:
            s.wfile.write(s.path2page(s.path))

    def do_GET(s):
        """Respond to a GET request."""
        s.send_response(200)
        s.send_header("Content-type", "text/html")
        s.end_headers()
        s.wfile.write(s.path2page(s.path))

    def path2page(s, path):
        if path == '/':
            path = '/index.html'
        if path == '/logout.html':
            logins.remove(s.client_address[0])
            return '<html><head><meta http-equiv="refresh" content="0;URL=\'/\'"/></head><body><p>This page has moved to <a href="/"></a>.</p></body></html>' # Terugsturen naar index
        if path == '/index.html' or path == '/style.css' or path == '/login.css' or path == '/jquery-2.1.4.js' or path == '/bootstrap.js' or path == '/verlichting.html'or path == '/instellingen_doeladressen.html' or path == '/instellingen_groepsadressen.html' :
            if not s.client_address[0] in logins:
                # Gebruiker niet ingelogd
                if path == '/index.html' or path == '/instellingen.html' or path == '/scenes.html' or path == '/verlichting.html'or path == '/instellingen_doeladressen.html' or path == '/instellingen_groepsadressen.html':
                    path = '/login.html'
            f = open('/home/pi/eindwerk/files'+path, 'r') # Lees pagina bestand uit map /files
            pagina = f.read()
            # HTML paginas aanpassen
            pagina = pagina.replace('%color1%', ('info' if button1 else 'default'))
            pagina = pagina.replace('%color2%', ('warning' if button2 else 'default')) #aanpassen
            pagina = pagina.replace('%color3%', ('danger' if button3 else 'default')) #aanpassen
            pagina = pagina.replace('%color4%', ('success' if button4 else 'default')) #aanpassen
            pagina = pagina.replace('%color5%', ('info' if button5 else 'default')) #aanpassen
            pagina = pagina.replace('%color6%', ('danger' if button6 else 'default')) #aanpassen
            return pagina
        if path.startswith('/fonts/'):
            if os.path.isfile('/home/pi/eindwerk/files/fonts/' + path.replace('/fonts/', '')):
                f = open('/home/pi/eindwerk/files/fonts/' + path.replace('/fonts/', ''), 'r')
                return f.read()
        return s.button(path)

    def button(s, path):
        global button1
        global button2
        global button3
        global button4
        global button5
        global button6

        global status1
        global status2
        global status3
        global status4
        global status5
        global status6

        if path == '/knop3':
            status3 = not status3
            wiringpi.digitalWrite(16,status3)
            # Knop 3
            # turn on the LEDs
            button3 = not button3
            return '<html><head><meta http-equiv="refresh" content="0;URL=\'/index.html\'"/></head><body><p>This page has moved to <a href="/"></a>.</p></body></html>' # Terugsturen naar index
        elif path == '/knop4':
            status4 = not status4
            wiringpi.digitalWrite(20,status4)
            # Knop 4
            # turn on the LEDs
            button4 = not button4
            return '<html><head><meta http-equiv="refresh" content="0;URL=\'/index.html\'"/></head><body><p>This page has moved to <a href="/"></a>.</p></body></html>' # Terugsturen naar index
        elif path == '/knop5':
            status5 = not status5
            wiringpi.digitalWrite(5,status5)
            # Knop 5
            # turn on the LEDs
            button5 = not button5
            return '<html><head><meta http-equiv="refresh" content="0;URL=\'/index.html\'"/></head><body><p>This page has moved to <a href="/"></a>.</p></body></html>' # Terugsturen naar index


        else:
            return '<html><head><title>404 Not found</title></head><body><p>Page not found</p></body></html>'

def audio():
    os.system('omxplayer files/1.mp3')


def serr():
    line = ""
    while True:
        data = ser.read()
        if(data == "\r"):
            print "Received from sensor:" + line
            line = ""
        else:
            line += data

if __name__ == '__main__':
    thread.start_new_thread(serr, ())

    server_class = BaseHTTPServer.HTTPServer
    httpd = server_class((HOST_NAME, PORT_NUMBER), MyHandler)
    print time.asctime(), "Server Starts - %s:%s" % (HOST_NAME, PORT_NUMBER)
    try:
        httpd.serve_forever()
    except KeyboardInterrupt:
        pass
    httpd.server_close()
    print time.asctime(), "Server Stops - %s:%s" % (HOST_NAME, PORT_NUMBER)
