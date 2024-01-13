

import Joi from 'joi'

export const schema = Joi.object({
    plc_nom: Joi.string().required().messages({
        "any.required": "l'intitulé est obligatoire",
        "string.empty": "l'intitulé est obligatoire",
    }),
    plc_theme: Joi.string().required().messages({
        "any.required": "le thème est obligatoire",
        "array.empty": "le thème est obligatoire",
    }),
    plc_address: Joi.object({
        'postalCode': Joi.string().optional().min(0),
        'streetAddress': Joi.string().required().messages({
            "any.required": "le thème est obligatoire",
            "string.empty": "le thème est obligatoire",
        }),
        'addressCountry': Joi.string().optional(),
        'addressLocality': Joi.string().optional().min(0),
    }),
    plc_descrcourtfr: Joi.string().required().messages({
        "any.required": "la description courte est obligatoire",
        "string.empty": "la description courte est obligatoire",
    }),
    plc_descrdetailfr: Joi.string().required().messages({
        "any.required": "la description détaillée est obligatoire",
        "string.empty": "la description détaillée est obligatoire",
    }),
    plc_contact : Joi.array().items(
        Joi.object({
            'Téléphone': Joi.string().min(10).max(10).required().messages({
                "any.required": "le numéro de téléphone est obligatoire",
                "string.empty": "le numéro de téléphone est obligatoire",
                "string.min": "le numéro de téléphone doit contenir au moins {{#limit}} caractères",
                "string.max": "le numéro de téléphone doit contenir au plus {{#limit}} caractères",
            }),
        }),
        Joi.object({
            'Mél': Joi.string().email({ tlds: false }).required().messages({
                "any.required": "l'email est obligatoire",
                "string.empty": "l'email est obligatoire",
                "string.email": "l'email doit etre valide",
            }),
        })
    ),
    plc_ouvertureenclair: Joi.string().required().messages({
        "any.required": "les horaires d'ouvertures sont obligatoire",
        "string.empty": "les horaires d'ouvertures sont obligatoire",
    }),
    plc_tarifsenclair: Joi.string().required().messages({
        "any.required": "le tarif est obligatoire",
        "string.empty": "le tarif est obligatoire",
    }),
    plc_illustrations: Joi.optional(),
    plc_validated: Joi.optional(),
})