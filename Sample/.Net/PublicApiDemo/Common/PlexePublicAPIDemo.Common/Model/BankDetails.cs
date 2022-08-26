using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class PrimaryBank
    {
        public string name { get; set; }
        public string accountNumber { get; set; }
        public string routingNumber { get; set; }
    }

    public class BankDetails
    {
        public object contentType { get; set; }
        public object serializerSettings { get; set; }
        public object statusCode { get; set; }
        public BankDetailsValue value { get; set; }
    }

    public class BankDetailsValue
    {
        public PrimaryBank primaryBank { get; set; }
        public object contactNumber { get; set; }
        public double advanceRate { get; set; }
        public object applicationId { get; set; }
        public DateTime firstRepayment { get; set; }
        public bool isfixed { get; set; }
        public string id { get; set; }
        public object isFirstAdavnce { get; set; }
        public string loanId { get; set; }
        public double percentageOfIncome { get; set; }
        public double totalRepayment { get; set; }
        public double weeklyForecastIncome { get; set; }
        public double weeklyRepayment { get; set; }
        public int weeks { get; set; }
        public double withdrawAmount { get; set; }
        public object otp { get; set; }
        public object calculation { get; set; }
    }
}
