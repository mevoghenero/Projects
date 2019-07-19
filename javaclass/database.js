import { book } from "./book";

let firstBook = new book('Stolen dreams', 'Brandon', 15, 'A story about a girls dream destroyed', 15);
let secondBook = new book('Sparrow', 'Li yifeng', 20, 'A fight for Justice', 10);
let thirdBook = new book('Game of thrones.', 'Brandon', 25, 'A quest for power', 25);
let fourthBook = new book('Vampire diaries', 'Bella', 35, 'Vampire movie', 40);

let bookList = [firstBook, secondBook, thirdBook, fourthBook];


 export { bookList };