import os
import logging

from uvicorn import run
from apistellar import Application

app_name = "service_p"

logging.basicConfig(level=logging.DEBUG)
app = Application(
    app_name, current_dir=os.path.dirname(os.path.abspath(__file__)))


if __name__ == "__main__":
    run(app)
