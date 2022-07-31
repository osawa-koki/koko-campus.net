import uno
import re

def touchFiles():
    nameColumn = 2
    subject = re.match(r"[\d\w]+", XSCRIPTCONTEXT.getDocument().Title).group(0)
    sql = "DELETE FROM subjects_page WHERE subject = '{}';\n\n".format(subject)
    sheets = XSCRIPTCONTEXT.getDocument().getSheets()
    path = XSCRIPTCONTEXT.getDocument().getURL().replace("file:///", "").replace(subject + ".ods", "(FILENAME)")
    for sheet in sheets:
        lesson = sheet.Name
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
                if x == nameColumn:
                    with open(path.replace("(FILENAME)", lesson + "/" + v + ".html"), "a") as f:
                        f.write("")
            y = y + 1