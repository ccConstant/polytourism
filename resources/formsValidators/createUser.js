import Joi from 'joi'

export const schema = Joi.object({
    name: Joi.string().min(5).required(),
    email : Joi.string().email({tlds : false}),
    country: Joi.string().required(),
    birth_date: Joi.date().required(),
    gender: Joi.string().required(),
    password: Joi.string().min(8).pattern(new RegExp('^.*[a-z]{1,}.*$')).pattern(new RegExp('^.*[A-Z]{1,}.*$')).pattern(new RegExp('^.*[&#$=+]{1,}.*$')),
    password_confirmation: Joi.string().valid(Joi.ref('password')),
})