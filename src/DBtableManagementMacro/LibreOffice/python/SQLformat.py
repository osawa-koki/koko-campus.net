import uno
import re

def SQLformat():
    subject = re.match(r"[\d\w]+", XSCRIPTCONTEXT.getDocument().Title).group(0)
    sheet = XSCRIPTCONTEXT.getDocument().getSheets()[0]
    path = XSCRIPTCONTEXT.getDocument().getURL().replace("file:///", "").replace(subject + ".ods", "SQLformat.sql")
    # カラム名の取得
    columnName = []
    x = 0
    while True:
        v = sheet.getCellByPosition(x, 0).String
        if v == "":
            break
        columnName.append(v)
        x = x + 1
    sql += "INSERT INTO {}({})\nVALUES\n".format(sheet.Name, ", ".join(columnName))
    recs = []
    y = 1
    while True:
        if sheet.getCellByPosition(0, y).String == "":
            break
        x = 0
        rec = []
        while True:
            v = sheet.getCellByPosition(x, y).String
            if v == "":
                break
            x = x + 1
            rec.append(v)
        recs.append("({})".format(", ".join(list(map(lambda a : "'{}'".format(a), rec)))))
        y = y + 1
    sql += ",\n".join(recs) + ";\n\n"
    with open(path, "w") as f:
        f.write(sql)
    return