import uno
import re

def subjectsPage():
    subject = re.match(r"[\d\w]+", XSCRIPTCONTEXT.getDocument().Title).group(0)
    sql = "DELETE FROM subjects_page WHERE subject = '{}';\n\n".format(subject)
    sheets = XSCRIPTCONTEXT.getDocument().getSheets()
    path = XSCRIPTCONTEXT.getDocument().getURL().replace("file:///", "").replace(subject + ".ods", "alterSubjectsPage.sql")
    for sheet in sheets:
        lesson = sheet.Name
        # カラム名の取得
        columnName = []
        x = 0
        while True:
            v = sheet.getCellByPosition(x, 0).String
            if v == "":
                break
            columnName.append(v)
            x = x + 1
        sql += "INSERT INTO subjects_page(subject, subject_lesson, {})\nVALUES\n".format(", ".join(columnName))
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
            recs.append("('{}', '{}', {})".format(subject, lesson, ", ".join(list(map(lambda a : "'{}'".format(a), rec)))))
            y = y + 1
        sql += ",\n".join(recs) + ";\n\n"
    with open(path, "w") as f:
        f.write(sql)
    return