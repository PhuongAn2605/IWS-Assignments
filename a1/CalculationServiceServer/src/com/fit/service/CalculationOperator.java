package com.fit.service;

public class CalculationOperator {
	
	public class CalculateOperator {

		public int add(int x, int y) {
			return x + y;
		}
		
		public int sub(int x, int y) {
			return x - y;
		}
		
		public int mul(int x, int y) {
			return x * y;
		}
		
		public int div(int x, int y) {
			try {
				return x / y;
			}catch (ArithmeticException e) { 
	            // Exception handler 
	            return 0;
	        }
		}
		
		
	}
}
