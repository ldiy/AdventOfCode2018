#include <stdio.h>
#include <stdlib.h>
#include <stdint.h>

int main(int argc, char const *argv[])
{
    int three = 0;
    int two = 0;

    FILE * fp;
    char * line = NULL;
    size_t len = 0;
    size_t read;
    fp = fopen("input.txt", "r");
    if (fp == NULL)
        exit(EXIT_FAILURE);

    while ((read = getline(&line, &len, fp)) != -1) {
        int check_three = 0;
        int check_two = 0;
        for(int i =0; i<len; i++){
            int count = 0;
           
            for(int x = 0; x<len; x++){
                if(line[i]==line[x]){
                    
                    count++;
                }
            }
            if(count == 2 && check_two == 0) { 
                two++; 
                check_two =1;
               // printf("2x : %c\n", line[i]);
            }
            if(count == 3 && check_three == 0){
                three++; 
                check_three=1;
               // printf("3x : %c\n", line[i]);
            }
        }
    }
    printf("3: %d\n 2: %d\n", three, two);
    printf("result: %d", three*two);
    fclose(fp);
    return 0;
}
