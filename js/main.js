$(document).ready(function () {
  "use strict";

  const $selectYear = $("#select_year");
  const $selectMonth = $("#select_month");
  const $selectDay = $("#select_day");
  const $birthdateInput = $("#birthdate");

  function setYear() {
    // 年を生成(1980年〜2025年)
    for (let i = 1980; i <= 2025; i++) {
      $selectYear.append($("<option>").val(i).text(i));
    }
  }

  function setMonth() {
    // 月を生成(1月〜12月)
    for (let i = 1; i <= 12; i++) {
      $selectMonth.append($("<option>").val(i).text(i));
    }
  }

  function setDay() {
    // 日の選択肢をクリア
    $selectDay.empty();

    // 日を生成（選択された年・月に応じる）
    const year = $selectYear.val();
    const month = $selectMonth.val();
    if (year && month) {
      const lastDay = new Date(year, month, 0).getDate();
      for (let i = 1; i <= lastDay; i++) {
        $selectDay.append($("<option>").val(i).text(i));
      }
    }

    updateBirthdate(); // 日付を更新
  }

  function updateBirthdate() {
    const year = $selectYear.val();
    const month = String($selectMonth.val()).padStart(2, "0");
    const day = String($selectDay.val()).padStart(2, "0");

    if (year && month && day) {
      $birthdateInput.val(`${year}-${month}-${day}`);
    }
  }

  // 初期ロード時に実行
  setYear();
  setMonth();
  setDay();

  // 年・月・日を変更したら hidden input に反映
  $selectYear.on("change", function () {
    setDay();
    updateBirthdate();
  });
  $selectMonth.on("change", function () {
    setDay();
    updateBirthdate();
  });
  $selectDay.on("change", updateBirthdate);
});
