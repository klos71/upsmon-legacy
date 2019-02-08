import send
from flask import Flask, request
app = Flask("request")
app.debug = True
#takes POSt request, and calls function in send.py
@app.route('/', methods=['POST'])
def result():
    if(request.form["method"] == "update"):
        send.updateUps(request.form["upsname"],request.form["ip"],request.form["upsnumber"])
        print("Sucsess")
    if(request.form["method"] == "remove"):
        send.removeUps(request.form["serial"])