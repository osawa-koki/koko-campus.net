/* const */

const sb = window.innerWidth <= 500;
const tb = 501 <= window.innerWidth && window.innerWidth <= 1000;
const fb = 1001 <= window.innerWidth;
const sbtb = window.innerWidth <= 1000;
const tbfb = 501 <= window.innerWidth;



const mailRegex = `^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$`;

const NAMESPACE_OF_SVG = "http://www.w3.org/2000/svg";
const SPACE = " ";






/* fx */

const eq = (a, b) => a === b;
const map = (fx, [a, ...b]) => (a !== undefined) ? [fx(a), ...map(fx, b)] : [];
const getElm = ([a, ...b]) => (a !== undefined) ? [document.getElementById(a), ...getElm(b)] : [];
const mkElm = ([a, ...b]) => (a !== undefined) ? [document.createElement(a), ...mkElm(b)] : [];
const mkElmSVG = ([a, ...b]) => (a !== undefined) ? [document.createElementNS(NAMESPACE_OF_SVG, a), ...mkElmSVG(b)] : [];
const zFill = (n, len) => (Array(len).join("0") + n).slice(-len);
const URLencodeAssoc = obj => Object.keys(obj).map(key => key + "=" + encodeURIComponent(obj[key])).join("&");
const between = (a, b) => c => a <= c.length && c.length <= b;

const regex = a => b => b.match(a);
const mailCheck = regex(mailRegex);

const regexGrouping = (a, b) => a.match(b).groups;


const removeChildren = parent => (parent.firstChild) ? [parent.removeChild(parent.firstChild), removeChildren(parent)] : [];

const apply = fx => arg => fx(arg);

const append = ([a, ...b], parent) => (a !== undefined) ? [parent.appendChild(a), append(b, parent)] : [];

const doNtimes = (n, fx, i = 0) => (i < n) ? [fx(i), doNtimes(n, fx, i + 1)] : [];

const round = n => i => Math.round(i * n) / n;
const round100 = round(100);