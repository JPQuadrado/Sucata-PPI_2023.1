function sleep(ms) {
    return new Promise((resolve) => setTimeout(resolve, ms));
}

const frases = ["sua cidade", "seu bairro", "o mundo"];
const el = document.getElementById("typeTexto");

let sleepTime = 100;

let index = 0;

const writeLoop = async () => {
    while (true) {
        let palavra = frases[index];

        for (let i = 0; i < palavra.length; i++) {
            el.innerText = palavra.substring(0, i + 1);
            await sleep(sleepTime);
        }

        await sleep(sleepTime * 10);

        for (let i = palavra.length; i > 0; i--) {
            el.innerText = palavra.substring(0, i - 1);
            await sleep(sleepTime);
        }

        await sleep(sleepTime * 5);

        if (index === frases.length - 1) {
            index = 0;
        } else {
            index++;
        }
    }
};

writeLoop();