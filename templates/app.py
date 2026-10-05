from flask import Flask, send_file

app = Flask(__name__, template_folder='.')

@app.route('/')
def index():
    return send_file('index.php')

@app.route('/<filename>')
def show_file(filename):
    return send_file(filename)

if __name__ == '__main__':
    app.run(debug=True)