"use strict";

const BIN = 2;
const OCT = 8;
const DEC = 10;
const HEX = 16;
const FILE_SIZE_CONFIRM_LIMIT = 10 << 20;

const [importImg, exportImg, fileButton, fileName, editerX, editerY, loading] = getElm(["importImg", "exportImg", "fileButton", "fileName", "editerX", "editerY", "loading"]);


function importFile() {
	fileButton.click();
}

fileButton.addEventListener("change", function() {
	const file = fileButton.files[0]; // ★ fst(fileButton.files)
	const reader = new FileReader();
	reader.readAsArrayBuffer(file);
	reader.onload = () => {
		loading.classList.add("loading");
		exportImg.classList.remove("unable");
		removeChildren(editerX);
		removeChildren(editerY);
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
	hexElement.value = dataView.getUint8(i).toString(HEX).toUpperCase().padStart(2, "0");
	hexElement.addEventListener("input", function() {
		const value = this.value;
		this.value = value.replace(/[^a-fA-F0-9]/, "").slice(-2).toUpperCase();
	});
	hexElement.addEventListener("focus", function() {
		const length = this.value.length;
		setTimeout(() => { // FIX ME
			this.setSelectionRange(length, length);
		}, 10);
	});
	editerX.appendChild(hexElement);
	loading.classList.remove("loading");
}

importImg.addEventListener("click", importFile);





