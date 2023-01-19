function submitForm(formID) {
  const form = document.querySelectorAll(formID);
  const inputs = Array.from(document.querySelectorAll(".formDataValue")).filter(
    (item) => !item.classList.contains("button-submit")
  );

  const textareas = document.querySelectorAll("textarea");

  // let formData = {};

  // formData = inputs.reduce((target, input) => {
  //   const name = input.getAttribute("name");
  //   target[name] = input.value;
  //   return target;
  // }, {});

  const postData = async (url, data) => {
    let response = await fetch(url, {
      method: "POST",
      // headers: {
      //   Accept: "application/json",
      //   "Content-Type": "application/json",
      // },
      body: data,
    });

    return await response;
  };

  const clearInputs = () => {
    inputs.forEach((input) => (input.value = ""));
    textareas.forEach((input) => (input.value = ""));
  };

  form.forEach((item) => {
    const action = item.getAttribute("action");

    item.addEventListener("submit", (e) => {
      e.preventDefault();

      // const statusMessage = document.querySelector(".status");
      // statusMessage.classList.add("visible");

      // const formData = new FormData(item);

      let formData = {};

      formData = inputs.reduce((target, input) => {
        const name = input.getAttribute("name");
        target[name] = input.value;
        return target;
      }, {});

      console.log(formData);

      postData(action, formData)
        .then((response) => {
          console.log(`GOOOD`);
        })
        .catch((error) => {
          console.log("ERROR");
        })
        .finally(() => {
          clearInputs();
          // setTimeout(() => statusMessage.classList.remove("visible"), 2500);
        });
    });
  });
}

const setHeaderPosition = (className) => {
  const header = document.querySelector(className);

  const handlerPosition = (e) => {
    let stickyPosition = header.offsetTop;

    window.pageYOffset > stickyPosition
      ? header.classList.add("sticky")
      : header.classList.remove("sticky");
  };

  window.addEventListener("scroll", handlerPosition);
};

const showingTabs = (triggerClass, tabClass) => {
  const trigger = document.querySelector(triggerClass);

  const triggerName = triggerClass.slice(1);
  const tabName = tabClass.slice(1);

  const tabs = Array.from(document.querySelectorAll(tabClass)).filter((item) =>
    item.classList.contains(`${tabName}--disabled`)
  );

  trigger.addEventListener("click", (e) => {
    e.currentTarget.classList.toggle(`${triggerName}--active`);
    tabs.forEach((tab) => {
      tab.classList.toggle(`${tabName}--disabled`);
    });
  });
};

const _getElem = (className) => document.querySelector(className);

const checkElem = (classNameTrigger, classNameInner) => {
  if (_getElem(classNameInner)) {
    showingTabs(classNameTrigger, classNameInner);
  }
};

submitForm("#contactUs");
setHeaderPosition(".header");

checkElem(".hide-tabs-button", ".projects-nav__item");
