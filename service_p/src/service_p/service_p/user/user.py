from apistellar import Type, validators


class User(Type):
    id = validators.Integer()
    name = validators.String()
    created_at = validators.DateTime()
    updated_at = validators.DateTime()

