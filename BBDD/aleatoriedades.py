from faker import Faker
import random
import mysql.connector
import bcrypt
from datetime import datetime, timedelta

# -----------------------------------------
# CONFIGURACIÓ BASE DE DADES
# -----------------------------------------

DB_CONFIG = {
    "host": "localhost",
    "user": "root",
    "password": "",          # XAMPP normalment sense password
    "database": "projecte"
}

fake = Faker("es_ES")

# -----------------------------------------
# CONNEXIÓ A LA BASE DE DADES
# -----------------------------------------

conn = mysql.connector.connect(**DB_CONFIG)
cursor = conn.cursor()

# -----------------------------------------
# INSERCIÓ D’USUARIS
# -----------------------------------------

#usuaris = ["Oleguer", "Sergi", "David"]
#password_plana = "P@ssw0rd"
#password_hash = bcrypt.hashpw(password_plana.encode(), bcrypt.gensalt()).decode()

#for nom in usuaris:
   # cursor.execute("""
      #  INSERT INTO usuaris (nom_usuari, password_hash)
     #   VALUES (%s, %s)
     #   ON DUPLICATE KEY UPDATE nom_usuari = nom_usuari;
    #""", (nom, password_hash))

#print("Usuaris creats correctament")

# -----------------------------------------
# GENERADOR DE DATES (2 PER DIA 2022–2025)
# -----------------------------------------

def dates_2022_2025():
    data_inici = datetime(2022, 1, 1)
    data_fi = datetime(2026, 1, 4)

    data = data_inici
    while data <= data_fi:
        yield datetime(data.year, data.month, data.day, 8, 0, 0)
        yield datetime(data.year, data.month, data.day, 20, 0, 0)
        data += timedelta(days=1)

# -----------------------------------------
# INSERCIÓ DE DADES DIÀRIES (2/DIA)
# -----------------------------------------

def inserir_dades_diaries(taula, min_val, max_val, decimals=2):
    for data in dates_2022_2025():
        valor = round(random.uniform(min_val, max_val), decimals)
        cursor.execute(
            f"INSERT INTO {taula} (valor, data_registre) VALUES (%s, %s)",
            (valor, data)
        )
    print(f"Dades inserides a {taula} (2 registres/dia 2022–2025)")

# -----------------------------------------
# GENERACIÓ DADES METEOROLÒGIQUES
# -----------------------------------------

# Temperatura (ºC)
inserir_dades_diaries("temperatura", -5, 38)

# Humitat (%)
inserir_dades_diaries("humitat", 20, 100)

# Pressió atmosfèrica (hPa)
inserir_dades_diaries("pressio", 980, 1040)

# Velocitat del vent (km/h)
inserir_dades_diaries("vent", 0, 80)

# Precipitació (mm)
inserir_dades_diaries("precipitacio", 0, 50)

# -----------------------------------------
# COMMIT I TANCAMENT
# -----------------------------------------

conn.commit()
cursor.close()
conn.close()

print("Base de dades omplerta: 2 registres per dia del 2022 al 2025")
