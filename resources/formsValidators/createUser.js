import Joi from 'joi'

export const schema = Joi.object({
    name: Joi.string().min(5).required().messages({
        "any.required" : "le nom est obligatoire",
        "string.empty" : "le nom est obligatoire",
        "string.min": "le nom doit contenir au moins {{#limit}} caractères",
    }),
    email: Joi.string().email({ tlds: false }).messages({
        "any.required": "l'email est obligatoire",
        "string.empty": "l'email est obligatoire",
        "string.email": "l'email doit être valide",
    }),
    country: Joi.string().required().messages({
        "any.required": "le pays est obligatoire",
        "string.empty": "le pays est obligatoire",
    }),
    birth_date: Joi.date().required().messages({
        "any.required": "la date de naissance est obligatoire",
        "date.base": "la date de naissance doit être valide",
    }),
    gender: Joi.string().required().messages({
        "any.required": "le sexe est obligatoire",
        "string.empty": "le sexe est obligatoire",
    }),
    password: Joi.string().min(8).pattern(new RegExp('^.*[a-z]{1,}.*$')).pattern(new RegExp('^.*[A-Z]{1,}.*$')).pattern(new RegExp('^.*[#?!@$%^&*-@{}.+-:,_]{1,}.*$')).messages({
        "any.required": "le mot de passe est obligatoire",
        "string.empty": "le mot de passe est obligatoire",
        "string.min": "le mot de passe doit contenir au moins {{#limit}} caractères",
        "string.pattern.base": "le mot de passe doit contenir au moins une majuscule,minuscule et un caractère spécial",
    }),
    password_confirmation: Joi.string().valid(Joi.ref('password')).messages({
        "any.required": "la confirmation de mot de passe est obligatoire",
        "string.empty": "la confirmation de mot de passe est obligatoire",
        "any.only": "les deux mots de passe doivent être identiques"
    }),
})