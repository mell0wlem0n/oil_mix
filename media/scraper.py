import requests
import csv
from bs4 import BeautifulSoup
from urllib.parse import urljoin

# URL-ul paginii de unde dorim să extragem datele
base_url = 'https://www.youngliving.com/ro_RO/products/c/uleiuri-esen%C5%A3iale-simple-amestecuri/amestecuri-de-uleiuri-esen%C5%A3iale'
# Realizăm solicitarea HTTP către pagina web
response = requests.get(base_url)

# Verificăm dacă solicitarea a fost cu succes
if response.status_code == 200:
    # Inițializăm BeautifulSoup cu conținutul paginii
    soup = BeautifulSoup(response.content, 'html.parser')

    # Găsim toate elementele de tipul "a" care au clasa "product"
    product_links = soup.find_all('a', class_='product')

    # Deschidem fișierul CSV în modul de scriere
    with open('rezultate.csv', 'w', newline='', encoding='utf-8') as file:
        writer = csv.writer(file,delimiter=',',quotechar='"')

        # Scriem antetul în fișierul CSV

        # Iterăm prin fiecare element pentru a extrage informațiile dorite
        for product_link in product_links:
            # Extragem href-ul produsului și construim URL-ul complet
            product_url = urljoin("https://www.youngliving.com/ro_RO/products/", product_link['href'])

            # Realizăm solicitarea HTTP către pagina produsului
            product_response = requests.get(product_url)

            if product_response.status_code == 200:
                # Inițializăm BeautifulSoup cu conținutul paginii produsului
                product_soup = BeautifulSoup(product_response.content, 'html.parser')

                # Extragem titlul produsului
                title = product_soup.find('h1').text
                # Extragem descrierea produsului
                description = product_soup.find('div',class_="description").text.strip()

                # Extragem ingredientele produsului
                ingredients = product_soup.find('div', id='ingredientsContent')
                ingredients = ingredients.find('div', class_='content').text.strip()
                # Extragem modul de utilizare al produsului
                usage = product_soup.find('div', id='howToUseContent')
                usage = usage.find('div', class_='content').text.strip()
                
                # Scriem rândul în fișierul CSV
                
                title_aux = title.lower().split()
                if title[0].isnumeric():
                    path = "../media/poze/uleiuri/"
                    mrg = ""
                    for i in title_aux:
                        if not i.isnumeric():
                           mrg = mrg +"_" + i
                    path = path+mrg[1:]+".jpg"
                elif len(title_aux)>1:
                    path = "../media/poze/uleiuri/"
                    mrg = ""
                    for i in title_aux:
                        mrg = mrg + "_"+i
                    path = path +mrg[1:]+".jpg"
                
                else:
                    path = "../media/poze/uleiuri/"+title.lower()+".jpg"
                writer.writerow(['\"','\"'+title+'\"', description, ingredients, usage,'\"'+product_url+'\"', '\"'+path+'\"'])
            else:
                print(f'Nu s-a putut accesa pagina produsului: {product_url}')
else:
    print('Nu s-a putut accesa pagina web.')
