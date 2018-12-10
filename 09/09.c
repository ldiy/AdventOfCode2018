#include <stdio.h> 
#include <stdlib.h> 

struct Node { 
    unsigned long data; 
    struct Node* next; 
    struct Node* prev; 
}; 


void display(struct Node* start) 
{ 
  /*  struct Node *temp = start; 
  
    printf("\nTraversal in forward direction \n"); 
    while (temp->next != start) 
    { 
        printf("%d ", temp->data); 
        temp = temp->next; 
    } 
    printf("%d ", temp->data); */
  
   /* printf("\nTraversal in reverse direction \n"); 
    struct Node *last = start->prev; 
    temp = last; 
    while (temp->prev != last) 
    { 
        printf("%d ", temp->data); 
        temp = temp->prev; 
    } 
    printf("%d ", temp->data); */
    printf("\n");

}
void insert(struct Node* prev_node, int data){
    struct Node* new_node = (struct Node*)malloc(sizeof(struct Node)); 
    new_node->data = data;
    new_node->next = prev_node->next;
    prev_node->next->prev = new_node;
    prev_node->next = new_node;
    new_node->prev = prev_node;
    
}
void remove_node(struct Node* node){
    node->prev->next = node->next;
    node->next->prev = node->prev;
    node = NULL;
}

int main() 
{ 
    int players = 425;
    int last_marble = 7084800;
    unsigned long scores[players+1];
    for(int i =1;i<=players;i++){
        
            scores[i] =0;
    }
    struct Node* current_marble = (struct Node*)malloc(sizeof(struct Node));
    current_marble->data =0;
    current_marble->next = current_marble;
    current_marble->prev = current_marble;
    int current_player = 1;
    for(int i =1; i<=last_marble;i++){
        if(i%23 == 0){
            //current_marble->next = current_marble->prev->prev->prev->prev->prev->prev->next;
            current_marble = current_marble->prev->prev->prev->prev->prev->prev->prev;
            //current_marble->data = current_marble->prev->prev->prev->prev->prev->prev->data;
            scores[current_player] += i + current_marble->prev->data;
            remove_node(current_marble->prev);
            current_marble = current_marble->next;

        }else{
            insert(current_marble,i);
            current_marble = current_marble->next->next;
        }
        if(current_player<players){
            current_player++;
        }else{
            current_player =1;
        }
        //display(current_marble);
    }
    unsigned long max_score =0;
    for(int i =1;i<=players;i++){
        if(scores[i]>max_score)
            max_score = scores[i];
    }
    printf("max score: %ld",max_score);
   // getchar(); 
    return 0; 
} 
