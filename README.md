# Projecte Web Meteorològica

Aquest projecte és un sistema web per a la visualització de dades meteorològiques, desenvolupat amb PHP i MySQL. Les dades meteorològiques inclouen temperatura, humitat, pressió, velocitat del vent i precipitació. També s'ha inclòs un script en Python per generar dades de prova.

---

##Demostració

Pots visualitzar el vídeo de demostració inclòs al repositori:

[Veure la demostració (Demostració_Projecte.mp4)](Demostració_Projecte.mp4)

> Si el reproductor inline no funciona al README, fes clic al enllaç per descarregar/visualitzar el fitxer directament.

---

## 👥 Membres del projecte

- [Oleguer Esteo](https://olegueresteo.es/)  
- [David Gutierrez](https://davidgutierrez.es/)  
- Sergi Gallart

---

## Tecnologies utilitzades

- PHP  
- MySQL  
- HTML / CSS  
- Python (per a generar dades de prova)  
- Faker (llibreria de Python)  
- XAMPP (Apache + MySQL + PHP)

---

## Requisits previs

- XAMPP (o un entorn equivalent amb Apache, PHP i MySQL)  
- Python 3 (per executar l'script de generació de dades)  
- pip (gestor de paquets Python)

---

## Instruccions per posar en marxa el projecte

1. Instal·la XAMPP i inicia els serveis:
   - Apache → Start  
   - MySQL → Start

2. Importa la base de dades:
   - Els scripts per crear la base de dades i les taules es troben a:
     ```
     BBDD/script.sql
     ```
   - Pots executar aquest script amb phpMyAdmin o la consola de MySQL:
     - phpMyAdmin: accedeix a `http://ip_servidor/phpmyadmin` i importa `BBDD/script.sql`.
     - Consola MySQL:
       ```bash
       mysql -u usuari -p nom_base_de_dades < BBDD/script.sql
       ```

---

## Generació de dades de prova (Python + Faker)

S'ha creat un script en Python (`aleatoridades.py`) per generar dades de prova automàticament.

Característiques:
- Utilitza la llibreria `Faker`.
- Genera dades per als anys 2022 a 2025.
- Per cada dia es generen dues entrades diàries per a cada variable meteorològica (temperatura, humitat, pressió, vent i precipitació).

### Executar l'script de generació de dades

És recomanable utilitzar un entorn virtual Python:

1. Crear l'entorn virtual:
   ```bash
   python3 -m venv venv
   ```

2. Activar l'entorn virtual:
   - Linux / macOS:
     ```bash
     source venv/bin/activate
     ```
   - Windows (PowerShell):
     ```powershell
     .\venv\Scripts\Activate.ps1
     ```

3. Instal·lar dependències:
   ```bash
   pip install faker
   ```

4. Executar l'script:
   ```bash
   python aleatoridades.py
   ```

5. Desactivar l'entorn virtual:
   ```bash
   deactivate
   ```

---

## Accés al projecte

Un cop el projecte està en funcionament, es pot accedir a:

- Web del projecte:
  ```
  http://ip_servidor/Projecte/index.php
  ```

- phpMyAdmin:
  ```
  http://ip_servidor/phpmyadmin
  ```

(Substitueix `ip_servidor` per l'adreça IP o `localhost` segons el teu entorn.)

---

## 📁 Estructura del projecte (resum)

Arbre de fitxers i carpetes principals:

```
MeteoSapa
├── /BBDD
│   └── aletoriedades.py
│   └── scripts.sql
├── /styles
│   └── styles.css
├── /imatges
│   └── fondo7.jpg
│   └── logo.png
├── /login               
│   └── login.php
│   └── login_processar.php
│   └── logout.php
│   └── registre.php
│   └── registre_processar.php
├── index.php
├── header.php
├── footer.php
├── connexio.php
├── contacte.php
├── humitat.php
├── precipitacio.php
├── preferits.php
├── preferits_afegir.php
├── preferits_eliminar.php
├── pressio.php
├── temperatura.php
└──vent.php
```

---

## Notes i recomanacions

- Revisar `connexio.php` per configurar usuari, contrasenya i nom de la base de dades abans d'executar l'aplicació.
- Assegura't que les rutes a imatges i fulls d'estil (`/estils`, `/imatges`) siguin accessibles des del servidor Apache.

---

## Contacte

- LinkedIn(Oleguer) : [Oleguer Esteo](https://www.linkedin.com/in/oleguer-esteo-mart%C3%ADnez/)  

Per dubtes o col·laboracions, contactar amb els membres del projecte indicats a la secció "Membres del projecte".

---
