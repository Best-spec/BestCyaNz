import easyocr
import torch
from transformers import MarianMTModel, MarianTokenizer


# โหลด OCR และ Translator
reader = easyocr.Reader(['en'])
model_name = 'Helsinki-NLP/opus-mt-en-th'
tokenizer = MarianTokenizer.from_pretrained(model_name)
model = MarianMTModel.from_pretrained(model_name).to('cuda' if torch.cuda.is_available() else 'cpu')

device = torch.device("cuda" if torch.cuda.is_available() else "cpu")

# ตัวแปรควบคุมการเปิด-ปิด
translation_enabled = True

# ฟังก์ชันแปลข้อความ
def translate(text):
    if not text.strip():
        return ""
    inputs = tokenizer(text, return_tensors="pt", padding=True, truncation=True, max_length=128).to(device)
    translated = model.generate(**inputs, max_new_tokens=60)
    return tokenizer.decode(translated[0], skip_special_tokens=True)