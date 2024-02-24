CREATE TABLE Admin (
    Username VARCHAR(50) PRIMARY KEY,
    Passwordd VARCHAR(50)
);

CREATE TABLE Instruction (
    InstructionID INT PRIMARY KEY,
    PhoneNumber VARCHAR(15),
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    Username VARCHAR(50),
    Passwordd VARCHAR(50),
    Email VARCHAR(100),
    Gender VARCHAR(10)
);

CREATE TABLE GymMember (
    MemberID INT PRIMARY KEY,
    PhoneNumber VARCHAR(15),
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    Username VARCHAR(50),
    Passwordd VARCHAR(50),
    Email VARCHAR(100),
    Gender VARCHAR(10)
);

CREATE TABLE WorkoutPlan (
    WorkoutPlanID INT PRIMARY KEY,
    WorkoutType VARCHAR(100)
);

CREATE TABLE DietPlan (
    DietPlanID INT PRIMARY KEY,
    DietType VARCHAR(100)
);

CREATE TABLE OnlineChat (
    InstructionID INT,
    GymMember INT,
    WorkoutPlanID INT,
    DietPlanID INT,
    PRIMARY KEY (InstructionID),
    FOREIGN KEY (InstructionID) REFERENCES Instruction(InstructionID),
    FOREIGN KEY (GymMember) REFERENCES GymMember(MemberID),
    FOREIGN KEY (WorkoutPlanID) REFERENCES WorkoutPlan(WorkoutPlanID),
    FOREIGN KEY (DietPlanID) REFERENCES DietPlan(DietPlanID)
);

CREATE TABLE ViewOfWorkout (
    GymMemberID INT,
    WorkoutPlanID INT,
    Verify BOOLEAN,
    WorkoutPDFFilePath VARCHAR(255),
    PRIMARY KEY (GymMemberID, WorkoutPlanID),
    FOREIGN KEY (GymMemberID) REFERENCES GymMember(MemberID),
    FOREIGN KEY (WorkoutPlanID) REFERENCES WorkoutPlan(WorkoutPlanID)
);


CREATE TABLE ViewOfDiet (
    GymMemberID INT,
    DietPlanID INT,
    Verify BOOLEAN,
    DietPlanPDFFilePath VARCHAR(255),
    PRIMARY KEY (GymMemberID, DietPlanID),
    FOREIGN KEY (GymMemberID) REFERENCES GymMember(MemberID),
    FOREIGN KEY (DietPlanID) REFERENCES DietPlan(DietPlanID)
);

