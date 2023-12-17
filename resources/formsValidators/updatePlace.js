import Joi from 'joi'

export const schema = Joi.object({
    plc_nom: Joi.string().required().messages({
        "any.required": "le nom est obligatoire",
        "string.empty": "le nom est obligatoire",
    }),
    plc_theme: Joi.string().messages({
        "any.required": "le thème est obligatoire",
        "string.empty": "le thème est obligatoire",
    }),
    plc_address: Joi.string().required().messages({
        "any.required": "l'adresse est obligatoire",
        "string.empty": "l'adresse est obligatoire",
    }),
    plc_descrcourtfr: Joi.string().required().messages({
        "any.required": "la description courte est obligatoire",
        "string.empty": "la description courte est obligatoire",
    }),
    plc_descrdetailfr: Joi.string().required().messages({
        "any.required": "la description détaillée est obligatoire",
        "string.empty": "la description détaillée est obligatoire",
    }),
    plc_tarifsenclair: Joi.number().required().messages({
        "any.required": "le tarif est obligatoire",
        "string.empty": "le tarif est obligatoire",
    }),
    tel: Joi.string().messages({
        "any.required": "le numéro de téléphone est obligatoire",
        "string.empty": "le numéro de téléphone est obligatoire",
        "string.min": "le numéro de téléphone doit contenir au moins {{#limit}} caractères",
        "string.max": "le numéro de téléphone doit contenir au plus {{#limit}} caractères",
    }),
    email: Joi.string().email({ tlds: false }).messages({
        "any.required": "l'email est obligatoire",
        "string.empty": "l'email est obligatoire",
        "string.email": "l'email doit être valide",
    }),
})