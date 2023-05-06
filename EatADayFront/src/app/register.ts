
export interface User {
    name: string;
    email: string;
    password: string;

}

export interface Results{
    success: boolean;
    message: string;
    data: User[];
}

//