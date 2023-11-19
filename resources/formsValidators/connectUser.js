import Joi from 'joi'

export const schema = Joi.object({
    email: Joi.string().email({ tlds: false }).messages({
        "any.required": "l'email est obligatoire",
        "string.empty": "l'email est obligatoire",
        "string.email": "l'email doit etre valide",
    }),
    password: Joi.string().min(8).pattern(new RegExp('^.*[a-z]{1,}.*$')).pattern(new RegExp('^.*[A-Z]{1,}.*$')).pattern(new RegExp('^.*[&#$=+]{1,}.*$')).messages({
        "any.required": "le mot de passe est obligatoire",
        "string.empty": "le mot de passe est obligatoire",
        "string.min": "le mot de passe doit contenir au moins {{#limit}} caractères",
        "string.pattern.base": "le mot de passe doit etre au format {{#regex}}",
    }),
})