from flask import Flask, render_template, request, Response
import sys


app=Flask(__name__)

@app.route('/')
@app.route('/home')
def home():
    return render_template("hello.html")
    #html을 보여주고 싶다면
    #return render_template('00.html')




if __name__ == "__main__":
    app.run(debug=True, threaded=True,host='172.30.1.4',port=5001)
