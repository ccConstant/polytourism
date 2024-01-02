/*'plc_nom' : '',
    'plc_theme' : '',
        'plc_address' : '',
            'plc_descrcourtfr': '',
                'plc_descrdetailfr' : '',
                    'plc_contact' : {
    tel: '',
        mail : ''
},
'plc_ouvertureenclair': null,
    'plc_tarifsenclair': '',
        'plc_illustrations' : '',
            'plc_rating' : null,
                'plc_validated' : false,*/

import Joi from 'joi'

export const schema = Joi.object({
    plc_nom: Joi.string().required().messages({
        "any.required": "l'intitulé est obligatoire",
        "string.empty": "l'intitulé est obligatoire",
    }),
    plc_theme: Joi.string().required().messages({
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
    plc_contact : Joi.object({
        tel : Joi.string().min(10).max(10).required().messages({
            "any.required": "le numéro de téléphone est obligatoire",
            "string.empty": "le numéro de téléphone est obligatoire",
            "string.min": "le numéro de téléphone doit contenir au moins {{#limit}} caractères",
            "string.max": "le numéro de téléphone doit contenir au plus {{#limit}} caractères",
        }),
        email: Joi.string().email({ tlds: false }).messages({
            "any.required": "l'email est obligatoire",
            "string.empty": "l'email est obligatoire",
            "string.email": "l'email doit etre valide",
        }),
    }),
    plc_ouvertureenclair: Joi.string().required().messages({
        "any.required": "les horaires d'ouvertures sont obligatoire",
        "string.empty": "les horaires d'ouvertures sont obligatoire",
    }),
    plc_tarifsenclair: Joi.string().required().messages({
        "any.required": "le tarif est obligatoire",
        "string.empty": "le tarif est obligatoire",
    }),
    plc_illustrations: Joi.optional(),
    plc_rating: Joi.number().required().messages({
        "any.required": "la note est obligatoire",
    }),
    plc_validated: Joi.optional(),
})