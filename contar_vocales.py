def contar_vocales(texto):
    vocales = "aeiouáéíóúAEIOUÁÉÍÓÚ"
    conteo = {v: 0 for v in "aeiou"}
    for letra in texto:
        l = letra.lower()
        if l in conteo:
            conteo[l] += 1
    total = sum(conteo.values())
    return conteo, total

cadena = input("Introduce una frase: ")
conteo, total = contar_vocales(cadena)

print(f"\nTotal de vocales: {total}")
for vocal, cantidad in conteo.items():
    print(f"{vocal}: {cantidad}")
