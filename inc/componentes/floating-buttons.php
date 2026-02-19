<?php

/**
 * Componente de Botones Flotantes
 */
?>

<div class="fixed right-4 top-1/2 -translate-y-1/2 z-[90] flex flex-col gap-3">
    <!-- Botón Cotizador -->
    <button id="floating-open-cotizador" class="w-14 h-14 bg-white rounded-md shadow-lg flex items-center justify-center border border-red-500/20 hover:border-red-500 transition-all group hover:scale-110 active:scale-95 duration-300 bg-transparent cursor-pointer">
        <svg width="21" height="30" viewBox="0 0 21 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9.5 12.9847C9.66348 13.2079 9.888 13.3657 10.1395 13.4342C10.708 13.5978 11.2675 13.3103 11.3893 12.7925C11.511 12.2742 11.071 11.7092 10.5027 11.5453C9.9345 11.3814 9.49425 10.8167 9.616 10.2986C9.73775 9.78056 10.297 9.49333 10.8655 9.65694C11.111 9.7225 11.333 9.87722 11.5 10.0992M10.5303 13.48V14M10.5303 9V9.61111" stroke="#FF4D4D" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M17.4565 3H18.5C19.6046 3 20.5 3.89543 20.5 5V27C20.5 28.1046 19.6046 29 18.5 29H2.5C1.39543 29 0.5 28.1046 0.5 27V5C0.5 3.89543 1.39543 3 2.5 3H4.41304" stroke="#FF4D4D" stroke-linecap="round" />
            <path d="M6.375 20H14.625M16.5 25H4.5" stroke="#FF4D4D" stroke-linecap="round" />
            <rect x="5.5" y="2" width="11" height="3" rx="0.6" fill="#FF4D4D" />
            <path d="M8.32725 0.302317C8.43407 0.115372 8.63288 0 8.84819 0H13.6518C13.8671 0 14.0659 0.115372 14.1728 0.302317L15.487 2.60232C15.7156 3.00231 15.4268 3.5 14.9661 3.5H7.53391C7.07321 3.5 6.78439 3.00231 7.01296 2.60232L8.32725 0.302317Z" fill="#FF4D4D" />
        </svg>

    </button>

    <!-- Botón Scroll to Top -->
    <button id="scroll-to-top" class="w-14 h-14 bg-white rounded-md shadow-lg flex items-center justify-center border-2 border-transparent hover:border-gray-200 opacity-0 invisible translate-y-10 transition-all duration-300 group hover:scale-110 active:scale-95 bg-transparent cursor-pointer">
        <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.5 14.5L14.5 6.5M14.5 6.5L22.5 14.5M14.5 6.5V28.5M0.5 0.5H28.5" stroke="#34323A" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

    </button>
</div>