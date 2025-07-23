function generarFibonacci(n) {
    let resultado = [0]; 

    for (let i = 0; i < n; i++) {
        if (i === 0 || i === 1) {
            resultado.push(1);
        } else {
            resultado.push(resultado[resultado.length - 1] + resultado[resultado.length - 2]);
        }
    }

    return resultado;
}

let n = 7;
let secuencia = generarFibonacci(n);
console.log("Fibonacci", n,".", secuencia);
