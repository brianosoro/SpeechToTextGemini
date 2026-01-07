# SpeechToTextGemini

A Php snippet you can use to **transcribe audio files** using Google's Gemini model and have the output displayed.

---

## Features

- **Easy to follow**
- **API Based** 
- **Accurate(sometimes more accurate than Whisper especially for languages i.e Swahili)**  

---

## Use Cases

- Transcribe audio files to their text equivalent.

---

## Installation & Use

Clone the repository:
```bash
git clone https://github.com/brianosoro/SpeechToTextGemini.git
cd SpeechToTextGemini
#Add an m4a audio file in the directory 
```
Install the intl extension(it is required, consider using Php 8.4):
```bash
sudo apt-get install php8.4-intl #For Ubuntu
```
Set up the **API Key** in line 12 of transcribe.php
```
```
Add the audio file inside the **SpeechToTextGemini** directory/folder
```
---
Start to transcribe, make sure you add an m4a audio file in the SpeechToTextGemini directory:
```bash
php transcribe.php
```
---

<img width="1164" height="575" alt="Screenshot from 2026-01-07 15-33-57" src="https://github.com/user-attachments/assets/9f2fa91b-7516-4dfa-ba14-907e0c86be27" />

## Contributing

Contributions are welcome! Anyone should be able to initiate a pull request.

---

## License

MIT License - feel free to use in your projects!

---

## Contact

For questions or suggestions, please open an issue on GitHub.

---
