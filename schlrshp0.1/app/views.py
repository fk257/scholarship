from app import app
from app import db, models
from flask import jsonify
import datetime, json

def model_to_dict(inst, cls):
  """
  Jsonify the sql alchemy query result. Skips attr starting with "_"
  """
  convert = { "DATETIME": datetime.datetime.isoformat}
  d = dict()
  for c in cls.__table__.columns:
    if c.name.startswith("_"):
      continue
    v = getattr(inst, c.name)
    current_type = str(c.type)
    if current_type in convert.keys() and v is not None:
      try:
        d[c.name] = convert[current_type](v)
      except:
        d[c.name] = "Error:  Failed to covert using ", unicode(convert[c.type])
    elif v is None:
      d[c.name] = unicode()
    else:
      d[c.name] = v
  return d


@app.route('/')
@app.route('/index')
def index():
    return "Bloomberg Scholarship\n"

@app.route('/funds', methods=['GET'])
def get_groups():
    rows = models.Funds.query.all()
    r_to_dict = [model_to_dict(i, models.Funds) for i in rows]
    json_ls = jsonify(r_to_dict)
    return json_ls
