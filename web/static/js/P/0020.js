"use strict";

const BIN = 2;
const OCT = 8;
const DEC = 10;
const HEX = 16;
const FILE_SIZE_CONFIRM_LIMIT = 10 << 20;

const byteObjects = [];
const makeByteObject = (index, uint8, doc) => ({
	index: index,
	uint8: uint8,
	doc: doc,
});

const [importImg, exportImg, fileButton, fileName, editerX, editerY, loading] = getElm(["importImg", "exportImg", "fileButton", "fileName", "editerX", "editerY", "loading"]);
const [x_uint8, x_bit, x_utf8, x_utf16, x_sjis, x_eucjp] = getElm(["x_uint8", "x_bit", "x_utf8", "x_utf16", "x_sjis", "x_eucjp"]);

function importFile() {
	fileButton.click();
}

fileButton.addEventListener("change", function() {
	const file = fst(fileButton.files);
	const reader = new FileReader();
	reader.readAsArrayBuffer(file);
	reader.onload = () => {
		byteObjects.splice(0);
		loading.classList.add("loading");
		//exportImg.classList.remove("unable");
		removeChildren(editerX);
		const dataView = new DataView(reader.result);
		if (FILE_SIZE_CONFIRM_LIMIT < dataView.byteLength && !window.confirm(`ファイルサイズが「${dataView.byteLength}」バイトあります。\n処理を続行しますか???`)) {
			loading.classList.remove("loading");
			return;
		};
		fileName.textContent = file.name;
		try {
			doNtimes(dataView.byteLength, i => readOutByte(dataView, i));
		} catch (ex) {
			exportImg.classList.add("unable");
		}
	};
});

function readOutByte(dataView, i) {
	const [hexElement] = mkElm(["input"]);
	hexElement.type = "text";
	hexElement.classList.add("hex");
	const uint8 = dataView.getUint8(i);
	hexElement.value = uint8.toString(HEX).toUpperCase().padStart(2, "0");
	byteObjects.push(makeByteObject(i, uint8, hexElement));
	hexElement.addEventListener("input", function() {
		const value = this.value;
		this.value = value.replace(/[^a-fA-F0-9]/, "").slice(-2).toUpperCase();
	});
	hexElement.addEventListener("focus", function() {
		const length = this.value.length;
		setTimeout(() => { // FIX ME
			this.setSelectionRange(length, length);
		}, 10);
		showDetail(this);
	});
	editerX.appendChild(hexElement);
	loading.classList.remove("loading");
}

importImg.addEventListener("click", importFile);


function showDetail(me) {
	const myObject = finder(byteObjects, byteObject => byteObject.doc === me);
	x_uint8.textContent = myObject.uint8;
	x_bit.textContent = myObject.uint8.toString(BIN).padStart(8, "0");
	x_utf8.textContent = (() => {
		const charsStruct = {
			chars: [],
			start: null,
		};
		for (let i = myObject.index; 0 <= i; i--) {
			const bin = byteObjects[i].uint8.toString(BIN).padStart(8, "0");
			if (bin.match(/^0/)) {
				const textDecoder = new TextDecoder("utf-8");
				return textDecoder.decode(Uint8Array.from([byteObjects[i].uint8]).buffer);
			};
			if (!bin.match(/^11/)) continue;
			charsStruct.start = i;
			const byteLen = fst(bin.match(/^1+/)).length;
			doNtimes(byteLen, n => {
				const position = i + n;
				charsStruct.chars.push(byteObjects[position].uint8);
			});
			break;
		}
		const textDecoder = new TextDecoder("utf-8");
		return textDecoder.decode(Uint8Array.from(charsStruct.chars).buffer);
	})();
}
