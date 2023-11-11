import Joi from 'joi'

export const schema = Joi.object({
    email: Joi.string().email({ tlds: false }),
    password: Joi.string().min(8).pattern(new RegExp('^.*[a-z]{1,}.*$')).pattern(new RegExp('^.*[A-Z]{1,}.*$')).pattern(new RegExp('^.*[&#$=+]{1,}.*$')),
})