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
const ne = (a, b) => a !== b;
const gt = (a, b) => a > b;
const gtEq = (a, b) => a >= b;
const lt = (a, b) => a < b;
const ltEq = (a, b) => a <= b;

const and = (a, b) => a && b;
const or = (a, b) => a || b;
const xor = (a, b) => (a || b) && !(a && b);
const not = a => !a;
const truthy = a => Boolean(a);
const falsy = a => !truthy(a);

const apply = fx => arg => fx(arg);
const rec = fx => fx(fx);

const filter = (fx, [a, ...b]) => (a !== undefined) ? (fx(a)) ? [a, ...filter(fx, b)] : [...filter(fx, b)] : [];
const map = (fx, [a, ...b]) => (a !== undefined) ? [fx(a), ...map(fx, b)] : [];
const looper = ([a, ...b], fx) => (a !== undefined) ? [fx(a), ...looper(b, fx)] : [];
const any = ([a, ...b], fx) => (a !== undefined) ? or(fx(a), any(b, fx)) : false;
const all = ([a, ...b], fx) => (a !== undefined) ? and(fx(a), all(b, fx)) : true;
const anyIndex = ([a, ...b], fx, i = 0) => (a !== undefined) ? or(fx(a, i), anyIndex(b, fx, i + 1)) : false;
const allIndex = ([a, ...b], fx, i = 0) => (a !== undefined) ? and(fx(a, i), allIndex(b, fx, i + 1)) : true;
const countSatisfy = ([a, ...b], fx, i = 0) => (a !== undefined) ? countSatisfy(b, fx, i + (fx(a) ? 1 : 0)) : i;

const getElm = ([a, ...b]) => (a !== undefined) ? [document.getElementById(a), ...getElm(b)] : [];
const mkElm = ([a, ...b]) => (a !== undefined) ? [document.createElement(a), ...mkElm(b)] : [];
const mkElmSVG = ([a, ...b]) => (a !== undefined) ? [document.createElementNS(NAMESPACE_OF_SVG, a), ...mkElmSVG(b)] : [];
const zFill = (n, len) => (Array(len).join("0") + n).slice(-len);
const URLencodeAssoc = obj => Object.keys(obj).map(key => key + "=" + encodeURIComponent(obj[key])).join("&");
const between = (a, b) => c => and(a <= c.length, c.length <= b);
const switcher = (tf, afx, bfx, arg = null) => (tf) ? afx(arg) : bfx(arg);

const regex = a => b => b.match(a);
const mailCheck = regex(mailRegex);

const regexGrouping = (a, b) => a.match(b).groups;


const removeChildren = parent => (parent.firstChild) ? [parent.removeChild(parent.firstChild), removeChildren(parent)] : [];

const append = ([a, ...b], parent) => (a !== undefined) ? [parent.appendChild(a), ...append(b, parent)] : [];
const push = ([a, ...b], list) => (a !== undefined) ? [list.push(a), ...push(b, list)] : [];

const doNtimes = (n, fx, i = 0) => (i < n) ? [fx(i), ...doNtimes(n, fx, i + 1)] : [];

const round = n => i => Math.round(i * n) / n;
const round100 = round(100);

const NxN = (a, b, c = null) => [new Array(a).fill(new Array(b).fill(c))];
const NxNfx = (a, b, fx) => [new Array(a).fill(new Array(b).fill(fx()))];

const fromAtoB = (a, b, step = 1, eq = true, i = 0) => (((eq) ? ltEq : lt)(a + i, b)) ? [a + i, ...fromAtoB(a, b, step, eq, i + step)] : [];

const flatter = ([a, ...b]) => (a !== undefined) ? (Array.isArray(a)) ? [...flatter(a)] : [a, ...flatter(b)] : []; // ★★★
const mixupMesh = (a, b, i = 0) =>  (i < a.length * b.length) ? [[a[Math.floor(i / b.length)], b[i % b.length]], ...mixupMesh(a, b, i + 1)] : [];
