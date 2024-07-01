import os
import csv from bs4
import BeautifulSoup
import pandas as pd 
 
# Generation of csv file and definition of columns
col = ['botname', 'familie', 'standort', 'boden', 'farbe', 'blütezeit', 'wuchshöhe', 'abstand', 'pflege', 'schädlinge', 'vermehrung', 'winterhärte', 'bienenfreund', 'giftigkeit', 'roteliste'] 
 
with open('Garten/base_data.csv', 'w', newline='') as df:     
        write = csv.writer(df)
        write.writerow(col) 
 
# Scraping the files
folder_path = r'Garten/html_files'
file_paths = [os.path.join(folder_path, name) for name in os.listdir(folder_path)]
 
for path in file_paths:
        with open(path, 'r') as f:
                soup = BeautifulSoup(f, 'lxml')
                data = []         
                table = soup.find('table')         
                rows = table.find_all('tr')   
       
                for row in rows:          
                        value = row.find_all(['td'])             
                        value = [ele.text.strip() for ele in value]             
                        data.append(value)         
                val = (i[1] for i in data)        
  
                with open('Garten/base_data.csv', 'a', newline='') as df:             
                        write = csv.writer(df)             
                        write.writerow(val) 
 
# Obtaining the names of the plants 
file_names = os.listdir(folder_path) 
lst = [s.replace(".htm", "") for s in file_names] 
lst1 = [] 
for i in lst:     
        str1 = i.capitalize()     
        lst1.append(str1) 
 
# Adding the names of the plants and indices 
df = pd.read_csv('Garten/base_data.csv') 
df.index = [i for i in range(0, len(df.values))] 
df.insert(0, 'id', pd.Series(df.index)) 
df.insert(1, 'name', pd.Series(lst1)) 
df.to_csv('Garten/base_data.csv', index=False)
