/* const */

const sb = window.innerWidth <= 500;
const tb = 501 <= window.innerWidth && window.innerWidth <= 1000;
const fb = 1001 <= window.innerWidth;



const mailRegex = `^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$`;









/* fx */

const eq = (a, b) => a === b;
const map = fx => ([a, ...b]) => (a !== undefined) ? [fx(n), ...map(b)] : [];
const getElm = ([a, ...b]) => (a !== undefined) ? [document.getElementById(a), ...getElm(b)] : [];
const mkElm = ([a, ...b]) => (a !== undefined) ? [document.createElement(a), ...mkElm(b)] : [];
const zFill = (n, len) => (Array(len).join("0") + n).slice(-len);
const URLencodeAssoc = obj => Object.keys(obj).map(key => key + "=" + encodeURIComponent(obj[key])).join("&");
const between = (a, b) => c => a <= c.length && c.length <= b;

const regex = a => b => b.match(a);
const mailCheck = regex(mailRegex);

const regexGrouping = (a, b) => a.match(b).groups;


