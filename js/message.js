// Проверяем наличие параметра message в URL
const urlParams = new URLSearchParams(window.location.search);
const message = urlParams.get("message");

// Если есть сообщение, выводим его в модальном окне
if (message) {
  // Получаем элементы модального окна и текстового поля сообщения
  const modal = document.getElementById("message-modal");
  const modalText = document.getElementById("message-text");

  // Вставляем сообщение в текстовое поле
  modalText.innerText = message;

  // Открываем модальное окно
  modal.style.display = "block";

  // Назначаем функцию закрытия модального окна на кнопку закрытия и на фон
  const closeBtn = document.getElementsByClassName("close")[0];
  window.onclick = function (event) {
    if (event.target == modal || event.target == closeBtn) {
      closeModal();
    }
  };

  setTimeout(closeModal, 2000);

  function closeModal() {
    // Добавляем класс fadeout для анимации закрытия
    modal.classList.add("fadeout");
    // Через 0.5 секунд после начала анимации убираем модальное окно из DOM
    setTimeout(function () {
      modal.remove();
    }, 500);
  }
  // Получаем URL и объект URLSearchParams
  const url = new URL(window.location.href);
  const urlParams = url.searchParams;

  // Удаляем параметр message из URLSearchParams
  urlParams.delete("message");

  // Заменяем текущую историю браузера на новую без параметра message
  const newUrl = url.href.split("?")[0]; // удаляем все параметры из URL, кроме первого
  window.history.replaceState({}, document.title, newUrl);
}
