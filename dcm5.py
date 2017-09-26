import PyPDF2
import sys
reload(sys)
sys.setdefaultencoding('utf8')
pdf_file = open('dsm.pdf')
read_pdf = PyPDF2.PdfFileReader(pdf_file)

number_pages = read_pdf.getNumPages()

for i in range(0, number_pages):
    page = read_pdf.getPage(i)
    page_content = page.extractText()
    f = open(str(i+1)+'.txt','w')
    f.write(page_content)
    f.close()
# page = read_pdf.getPage(0)

# page_content = read_pdf.extractText()

# f = open('texto.txt', 'w')
# f.write(page_content)
# f.close()

# print page_content[11]