```markdown
# 🌦️ Projecte Web Meteorològica

Aquest projecte és un sistema web per a la visualització de dades meteorològiques, utilitzant PHP i MySQL. Les dades meteorològiques (temperatura, humitat, pressió, velocitat del vent, precipitació, etc.) es guarden a la base de dades i es poden consultar a través de la web.

---

## 👥 Membres del projecte

- **Oleguer Esteo**
- **David Gutierrez**
- **Sergi Gallart**

---

## 🧰 Tecnologia utilitzada

- PHP
- MySQL
- HTML / CSS
- Python (per a generar dades de prova)
- Faker (llibreria de Python)
- **XAMPP** (Apache + MySQL + PHP)

---

## ⚙️ Instruccions per posar en marxa el projecte

Per fer funcionar el projecte, cal seguir els següents passos:

### 1️⃣ Instal·lar XAMPP
Utilitzarem **XAMPP** com a entorn de servidor. XAMPP inclou:

- Apache (servidor web)
- MySQL (base de dades)
- PHP

Després d'instal·lar XAMPP, cal iniciar:

- Apache → **Start**
- MySQL → **Start**

---

### 2️⃣ Crear la base de dades

Els scripts per crear la base de dades i les taules es poden trobar al fitxer:

```

BBDD/script.sql

````

📌 **Important:**  
- No es detallen les taules aquí.
- Tots els comandos per crear les taules i inserir les dades estan al fitxer `script.sql`.

Per executar aquest script, pots utilitzar **phpMyAdmin** o la consola de MySQL.

---

## 🧪 Generació de dades de prova (Python + Faker)

Per provar el funcionament del projecte, s'ha desenvolupat un script en **Python** que genera dades de manera automàtica.

### Característiques de les dades generades:
- Utilitza la llibreria **Faker**
- Genera dades per als anys 2022 a 2025
- Per cada dia es generaran **dues dades diàries** per a cada variable meteorològica (temperatura, humitat, pressió, vent i precipitació)

---

## 🐍 Entorn virtual Python (venv)

Per executar el script de generació de dades, s'ha creat un **entorn virtual Python** per gestionar les dependències del projecte.

Passos per configurar l'entorn:

1️⃣ Crear l'entorn virtual:

```bash
python3 -m venv venv
````

2️⃣ Activar l'entorn virtual:

```bash
source venv/bin/activate
```

3️⃣ Instal·lar la llibreria Faker:

```bash
pip install faker
```

4️⃣ Executar l'script de generació de dades:

```bash
python aleatoridades.py
```

5️⃣ Desactivar l'entorn virtual un cop acabat:

```bash
deactivate
```

---

## 🌐 Accés al projecte

Un cop el projecte estigui en marxa, es pot accedir als serveis a través dels següents enllaços:

* **Web del projecte:**
  `http://ip_servidor/Projecte/index.php`

* **phpMyAdmin:**
  `http://ip_servidor/phpmyadmin`

---

## 📁 Estructura del projecte (resum)

```
/BBDD          -> Scripts SQL
/estils        -> Fitxers CSS
/imatges       -> Imatges
/login         -> Secció de login
index.php
header.php
footer.php
connexio.php
contacte.php
humitat.php
precipitacio.php
preferits.php
preferits_afegir.php
preferits_eliminar.php
pressio.php
temperatura.php
vent.php
```

```

Aquest és el README actualitzat per la nova estructura de fitxers. Ara fa referència correctament a les carpetes i fitxers que es veuen a la imatge que has penjat. Si necessites més modificacions, només cal que m'ho diguis!
```
