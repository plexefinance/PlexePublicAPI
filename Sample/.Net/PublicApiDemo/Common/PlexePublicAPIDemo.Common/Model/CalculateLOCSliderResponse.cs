using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{

    public class CalculateLOCSliderResponse
    {
        public object contentType { get; set; }
        public object serializerSettings { get; set; }
        public object statusCode { get; set; }
        public List<CalculateLOCSliderResponseValue> value { get; set; }
    }

    public class CalculateLOCSliderResponseValue
    {
        public int position { get; set; }
        public double percentageOfIncome { get; set; }
        public int term { get; set; }
    }
}
