from app import db

class Funds(db.Model):
    id = db.Column(db.Integer, primary_key=True, autoincrement=True)
    fund = db.Column(db.String(120), index=True)
    feature = db.Column(db.String(120), index=True)
    fund_id = db.Column(db.Integer, index=True)

    def __repr__(self):
        return '{{\'id\':{0},\'fund\':\'{1}\',\'feature\':\'{2}\', \'fund_id\':\'{3}\'}}'.format(self.id, self.fund, self.feature, self.fund_id)

# class Funds_types(db.Model):
#     id = db.Column(db.Integer, primary_key=True)
#     fundName = db.Column(db.String(120), index=True)
#     fundAmount = db.Column(db.Float, index=True)
#
#     def __repr__(self):
#         return '{{ \'id\': }}'
