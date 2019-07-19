

class book{
    constructor(title, author, pages, description, currentPage, read){
    this.title       = title;
    this.author      = author;
    this.pages       = pages;
    this.description = description;
    }

     readBook(pageNumber){

        for (pageNumber = 1; pageNumber > this.pages; pageNumber++){
            if(this.currentPage === this.pages){
                this.read = true;
                }else if(this.currentPage < this.pages){
                    this.read = false;
                }else{
                    return 'this page number is invalid.';
                }   
        }
     }
}




export { book };