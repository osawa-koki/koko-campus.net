import json
import pykakasi

SHORT_NAME, KEYWORDS = 0, 1
ignore_charctors = ["\\"]


def to_hira(word: str) -> str:
    result = kks.convert(word)
    return "".join([r["hira"] for r in result])


def is_contain_shortname(l: list[tuple[str, int]]) -> bool:
    for e in l:
        if e[1] == SHORT_NAME:
            return True
    return False


def drop_keywords(l: list[tuple[str, int]]) -> list[tuple[str, int]]:
    return [e for e in l if e[1] == SHORT_NAME]


def drop_symbol(l: list[tuple[str, int]]) -> list[tuple[str, int]]:
    return [e[0] for e in l]


kks = pykakasi.kakasi()
output = {}

json_open = open("emoji_ja.json", "r")
data = json.load(json_open)
for key in data:
    if key in ignore_charctors:
        continue

    wr = data[key]["short_name"]
    wh = to_hira(wr)
    if wh in output:
        output[wh].append((key, SHORT_NAME))
    else:
        output[wh] = [(key, SHORT_NAME)]

    for wr in data[key]["keywords"]:
        wh = to_hira(wr)
        if wh in output:
            output[wh].append((key, KEYWORDS))
        else:
            output[wh] = [(key, KEYWORDS)]
for ko in output:
    if is_contain_shortname(output[ko]):
        output[ko] = drop_keywords(output[ko])
    output[ko] = drop_symbol(output[ko])
    output[ko] = list(set(output[ko]))

with open("hira_to_emoji_v2.json", "w") as f:
    json.dump(output, f, indent=4, ensure_ascii=False)


output2 = {}
for key in data:
    if key in ignore_charctors:
        continue
    output2[key] = [data[key]["short_name"]]
    for e in data[key]["keywords"]:
        if e not in output2[key]:
            output2[key].append(e)

with open("emoji_info_v2.json", "w") as f:
    json.dump(output2, f, indent=4, ensure_ascii=False)
