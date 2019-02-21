from apistar import http
from apistellar import Controller, route, get, post


@route("/user")
class UserController(Controller):
    @get("/")
    def hello(name: http.QueryParam):
        return {"hello": name}

