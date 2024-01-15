export function parseString(str) {
    try {
        return JSON.parse(str.replace(/'/g, '"').substring(1, str.length - 1))
    } catch (e) {
        return ''
    }
}