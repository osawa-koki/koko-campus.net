import json
import pykakasi

kks = pykakasi.kakasi()

json_open = open("emoji_ja.json", "r")
data = json.load(json_open)
for key in data:
    result = kks.convert(data[key]["short_name"])
    data[key]["short_name_hira"] = "".join([r["hira"] for r in result])

hira_to_emoji = {}
for key in data:
    hira_to_emoji[data[key]["short_name_hira"]] = key


with open("emoji_ja_hira.json", "w") as f:
    json.dump(data, f, indent=4, ensure_ascii=False)

with open("hira_to_emoji.json", "w") as f:
    json.dump(hira_to_emoji, f, indent=4, ensure_ascii=False)
