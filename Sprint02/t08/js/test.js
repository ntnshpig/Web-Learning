describe("checkBrackets", function() {
  describe("---Correct cases---", function() {
      let correct = [
          "1)()(())2(()", 2,
          "(1 + 2 * 4", 1,
          "(1)()(())2(()", 1,
          "Hello brackets)!", 1,
          "((()))", 0,
          "((((", 4,
          ")(", 2,
          "((((((((((((()))))))))))", 2,
          "()()(", 1,
          "))()", 2
      ];

      let runCorrectTests = (value, result) => {
          it(`In "${value}" string have to add ${result} brackets`, function () {
              assert.equal(checkBrackets(value), result);
          });
      }
      for (let i = 0; correct[i]; i += 2)
          runCorrectTests(correct[i], correct[i + 1]);
  })
  describe("---Incorrect cases---", function() {
      let incorrect = [
          null,
          undefined,
          NaN,
          12356,
          "123456",
          true
      ];
      let runIncorrectTests = (value, result) => {
          it(`If income ${typeof value} return value is -1`, function () {
              assert.equal(checkBrackets(value), -1);
          });
      }
      for (let i = 0; i < incorrect.length; i++)
          runIncorrectTests(incorrect[i]);
  })
})
